class Search {
    constructor() {
        this.addSearchHTML();
        this.openButton = document.querySelector('.search-icon');
        this.closeButton = document.querySelector('.search-overlay__close');
        this.searchOverlay = document.querySelector('.search-overlay');
        this.searchField = document.getElementById('search-term');
        this.resultsDiv = document.getElementById('search-overlay__results');
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.previousValue;
        this.typingTimer;
        this.events();
    }

    //events
    events() {
        this.openButton.addEventListener("click", () => this.openOverlay());
        this.closeButton.addEventListener("click", () => this.closeOverlay());
        document.addEventListener("keydown", (e) => this.keyPressDispatcher(e));
        this.searchField.addEventListener("keyup", () => this.typingLogic());

    }

    //methods
    openOverlay() {
        this.searchOverlay.classList.add("search-overlay--active");
        document.body.classList.add("body-no-scroll");
        this.searchField.value = '';
        this.resultsDiv.innerHTML = '';
        setTimeout(() => this.searchField.focus(), 305);
        this.isOverlayOpen = true;
    }

    closeOverlay() {
        this.searchOverlay.classList.remove("search-overlay--active");
        document.body.classList.remove("body-no-scroll");
        this.isOverlayOpen = false;
    }

    keyPressDispatcher(e) {
        if (e.key === 's' && !this.isOverlayOpen) this.openOverlay();
        if (e.key === 'Escape' && this.isOverlayOpen) this.closeOverlay();
    }

    typingLogic() {

        if (this.searchField.value != this.previousValue) {
            clearTimeout(this.typingTimer);
            if (!this.isSpinnerVisible) {
                this.resultsDiv.innerHTML = '<div class="spinner-loader"></div>'
                this.isSpinnerVisible = true;
            }
            if (this.searchField.value == "") {
                this.resultsDiv.innerHTML = '';
                this.isSpinnerVisible = false;
            }
            else this.typingTimer = setTimeout(() => this.getResults(), 750);
        }
        this.previousValue = this.searchField.value;
    }

    getResults() {
        this.getJSON(theme_props.site_url + '/wp-json/wp/v2/posts?_embed&search=' + this.searchField.value, (err, posts) => {

            if (err) this.resultsDiv.innerHTML = "Unexpected Error ( " + err + " ). Please try again.";
            this.resultsDiv.innerHTML = `
                <h2 class="search-overlay__section-title">${posts.length} Results Found</h2>
                ${posts.length ? '<ul class="link-list min-list">' : '<p>No results found</p>'}                
                    ${posts.map(post => `<li><a href="${post.link}"><img src='${post._embedded['wp:featuredmedia']['0'].media_details.sizes.medium.source_url}'></img><div class="search-overlay__post-content"><h3>${post.title.rendered}</h3><p>${post.content.rendered.substring(0, 150)}...</p></div></a></li>`).join("")}
                ${posts.lenght ? '</ul>' : ''}
            `;
            this.isSpinnerVisible = false;


        })
    }

    getJSON(url, callback) {

        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = 'json';

        xhr.onload = function () {

            var status = xhr.status;

            if (status == 200) {
                callback(null, xhr.response);
            } else {
                callback(status);
            }
        };

        xhr.send();
    };

    addSearchHTML() {
        document.body.insertAdjacentHTML('beforeend', `
            <div class="search-overlay">
                <div class="search-overlay__top">
                    <div class="container">
                        <i class="fa fa-search search-overlay__icon" aria-hidden="true" style="font-size: 1.8rem;"></i>
                        <input type="text" class="search-term" placeholder="What are you looking for?" autocomplete="off" id="search-term">
                        <i class="fa fa-window-close search-overlay__close" aria-hidden="true" style="font-size: 1.8rem;"></i>
                    </div>
                </div>
                <div class="container">
                    <div id="search-overlay__results">

                    </div>
                </div>
            </div>
        `)
    }


}

let searchPosts = new Search();