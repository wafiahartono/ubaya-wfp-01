function data() {
    function getThemeFromLocalStorage() {
        // if user already changed the theme, use it
        if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
        }

        // else return their preferences
        return (
            !!window.matchMedia &&
            window.matchMedia('(prefers-color-scheme: dark)').matches
        )
    }

    function setThemeToLocalStorage(value) {
        window.localStorage.setItem('dark', value)
    }

    return {
        dark: getThemeFromLocalStorage(),
        toggleTheme() {
            this.dark = !this.dark
            setThemeToLocalStorage(this.dark)
        },
        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen
        },
        closeSideMenu() {
            this.isSideMenuOpen = false
        },
        isNotificationsMenuOpen: false,
        toggleNotificationsMenu() {
            this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
        },
        closeNotificationsMenu() {
            this.isNotificationsMenuOpen = false
        },
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen
        },
        closeProfileMenu() {
            this.isProfileMenuOpen = false
        },
        isPagesMenuOpen: false,
        togglePagesMenu() {
            this.isPagesMenuOpen = !this.isPagesMenuOpen
        },
        // Modal
        modalTitle: null,
        modalMessage: null,
        modalBody: null,
        modalPositiveText: null,
        modalPositiveCallback: null,
        modalCheckboxText: null,
        modalCheckboxChecked: false,
        modalIsOpen: false,
        trapCleanup: null,
        openModal(
            title, message, body,
            positiveText, positiveCallback,
            checkboxText
        ) {
            this.modalTitle = title
            this.modalMessage = message
            this.modalBody = body
            this.modalPositiveText = positiveText
            this.modalPositiveCallback = positiveCallback
            this.modalCheckboxText = checkboxText
            this.modalIsOpen = true
            this.trapCleanup = focusTrap(document.querySelector('#modal'))
        },
        modalPositive() {
            if (this.modalPositiveCallback) this.modalPositiveCallback()
            else this.closeModal()
        },
        closeModal() {
            this.modalTitle = null
            this.modalMessage = null
            this.modalBody = null
            this.modalPositiveText = null
            this.modalPositiveCallback = null
            this.modalCheckboxText = null
            this.modalCheckboxChecked = false
            this.modalIsOpen = false
            this.trapCleanup()
        },
        quote: null,
        getQuote() {
            this.quote = null
            fetch('https://quotable.io/random').then(r => r.json()).then(quote => {
                this.quote = quote
            })
        },
        showAddToCartModal(e) {
            let id = e.target.parentElement.getAttribute('data-id')
            //Ajax menggunakan function fetch
            fetch('products/' + id).then(r => r.json()).then(json => {
                let product = json['product']
                this.openModal(
                    'Add to Cart?',
                    product.name + ' will be added to your cart.',
                    null,
                    'Add to cart'
                )
            })
        },
        getCsrfToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        showDeleteProductModal(e) {
            let id = e.target.parentElement.getAttribute('data-id')
            this.openModal(
                'Delete product?',
                'You will be able recover the product data.',
                null,
                'Delete',
                () => {
                    fetch(
                        'products/' + id,
                        {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
                                'X-CSRF-TOKEN': this.getCsrfToken()
                            },
                            body: 'permanent=' + this.modalCheckboxChecked
                        }
                    ).then(() => {
                        this.closeModal()
                        location.reload()
                    })
                },
                'Delete permanently'
            )
        },
        async showCreateProductModal() {
            this.openModal(
                'Create Product',
                null,
                await fetch('products/create?ajax').then(r => r.text()),
                'Save',
                () => {
                    /** @type HTMLFormElement */
                    let form = document.getElementById('form-create')
                    fetch(
                        'products?ajax',
                        {
                            method: 'POST',
                            body: new FormData(form)
                        }
                    ).then(r => r.json()).then(product => {
                        console.log(product)
                        let tbody = document.querySelector('#table-products tbody');
                        let tr = tbody.lastElementChild.cloneNode(true)
                        tr.setAttribute('data-id', product['id'])
                        tr.children[0].textContent = product['id']
                        tr.children[1].textContent = product['created_at']
                        tr.children[2].textContent = product['updated_at']
                        tr.children[3].textContent = product['name']
                        tr.children[4].textContent = product['category']['name']
                        tr.children[5].children[0].children[2].href = 'products/' + product['id'] + '/edit'
                        tbody.appendChild(tr)
                        this.closeModal()
                    })
                }
            )
        },
        async showEditProductModal(id) {
            this.openModal(
                'Edit Product',
                null,
                await fetch('products/' + id + '/edit?ajax').then(r => r.text()),
                'Save',
                () => {
                    /** @type HTMLFormElement */
                    let form = document.getElementById('form-edit');
                    form.submit()
                }
            )
        }
    }
}
