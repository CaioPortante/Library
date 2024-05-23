@extends('layouts.app')

@section('title', 'Livros')
@section('pageTitle', 'Lista de Livros')

@section('content')

    <div class="flex flex-row justify-between px-8">
        <a href={{ route('dashboard') }}>
            <button type="button" class="mb-4 text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Voltar
            </button>
        </a>

        <div class="pr-8 w-1/4">
            <input name="search" id="search" type="text" placeholder="Buscar um Livro/Autor/ISBN" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        </div>
    </div>
    <div id="response-div" class="mt-8">

    </div>

    @push('scripts')
        <script>

            function searchBooks(search) {

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('{{ route("books.list.search") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ search: search })
                })
                .then(response => response.json())
                .then(books => {

                    let htmlContent = '';

                    if (books.length === 0) {
                        htmlContent = `
                            <div class="flex w-100 justify-center italic">
                                Nenhum livro encontrado
                            </div>
                        `;
                    } else{
                        htmlContent += `<div class="grid grid-cols-4 gap-4">`;

                        books.forEach(book => {

                            const route = "/loans/book/" + book.id;

                            if (book.quantity <= 0){
                                htmlContent += `
                                    <a class="relative block max-w-sm mx-auto p-6 bg-gray-200 border border-gray-400 rounded-lg shadow">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-700/75">${book.title}</h5>
                                        <p class="font-normal text-gray-500/75 mb-2">${book.description}</p>
                                        <p class="font-normal text-gray-400/75 text-sm absolute bottom-2 right-2">${book.isbn}</p>
                                        <p class="font-normal text-red-400 text-sm absolute bottom-2 left-8">Indisponível</p>
                                    </a>
                                `
                            }
                            else{
                                htmlContent += `
                                    <a href="${route}" 
                                        class="relative block max-w-sm mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-400/10 hover:border-gray-600 transition"
                                    >
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${book.title}</h5>
                                        <p class="font-normal text-gray-700">${book.description}</p>
                                        <p class="font-normal text-gray-400 text-sm absolute bottom-2 right-2">${book.isbn}</p>
                                        <p class="font-normal text-gray-400 text-sm absolute bottom-2 left-8">${book.quantity} Disponíveis</p>
                                    </a>
                                `
                            }
                        });

                        htmlContent += `</div>`
                    }

                    document.getElementById('response-div').innerHTML = htmlContent;
                })
                .catch(error => {
                    document.getElementById('response-div').innerHTML = `
                        <div class="flex w-100 justify-center italic">
                            <span>
                                Ocorreu um erro ao realizar a busca.<br>
                                Tente novamente, se o problema persistir contate um desenvolvedor
                            </span>
                        </div>
                    `;
                    console.error('Erro:', error);
                });

            }

            searchBooks('');

            $('#search').on('keyup', (input) => {
                searchBooks(input.target.value)
            })

        </script>
    @endpush

@endsection