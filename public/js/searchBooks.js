function searchBooks(search) {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch("/books/list/search", {
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
                        <a href="{{ route('loan.book', ['id' => ${book.id}]) }}" 
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