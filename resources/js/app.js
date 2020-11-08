require('./bootstrap');

const toggleFavorite = (id) => {

    axios.put(`/phones/${id}/favorite`)
        .then((response) => {

            let favoriteButton = document.getElementById('favorite-button')

            favoriteButton.innerText =
                response.data.favorite
                    ? 'В избранном'
                    : 'Добавить в избранное'

        })

}

document.addEventListener('DOMContentLoaded', () => {

    let favoriteButton = document.getElementById('favorite-button')

    if(!favoriteButton)
        return

    favoriteButton.addEventListener('click', () => {
        let id = favoriteButton.dataset.id ?? null

        if (id)
            toggleFavorite(id)

    })

})
