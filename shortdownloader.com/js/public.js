function PublicController() {
    return {
        scrollBackTop: false,
        token: null,
        menu: false,
        paged: 3,
        load: null,
        change: null,
        downloads: null,
        download: null,
        root: document.getElementsByTagName("html")[0],
        result: null,
        loading: false,
        animate: false,
        changeTheme(e) {
            this.token = e.target.getAttribute("data-token");
            this.change = e.target.getAttribute("data-change");
            this.root.classList.toggle("dark");
            $.ajax({
                type: "POST",
                url: this.change,
                data: {
                    _token: this.token,
                },
                success: function (response) {},
            });
        },
        downloadVideo(e) {
            this.loading = true;
            this.token = e.target.getAttribute("data-token");
            this.downloads = e.target.getAttribute("data-downloads");
            this.download = e.target.getAttribute("data-download");
            $.ajax({
                type: "POST",
                url: this.download,
                data: {
                    _token: this.token,
                    downloads: this.downloads,
                },
                success: function (response) {
                    this.loading = false;
                    $("#download").html(response);
                },
            });
        },
        loadMore(e) {
            this.animate = true;
            setTimeout(() => {
                this.animate = false;
            }, 1000);
            var shorts = $("#shorts");
            this.token = shorts.data("token");
            this.load = shorts.data("load");
            var option = shorts.data("option");
            var paged = shorts.data("page");
            var req = $.ajax({
                type: "POST",
                url: this.load,
                data: {
                    _token: this.token,
                    option: option,
                    paged: paged,
                },
                success: function (response) {
                    var page = req.getResponseHeader("paged");
                    $("#shorts").data("page", page);
                    $(".shortsItem").last().after(response);
                    // console.log(req.getAllResponseHeaders());
                    if (response === "") {
                        $("#loadmore").hide();
                        $("#nomore").show();
                    }
                },
            });
        },
        showCookieBanner:
            localStorage.getItem("showCookieBanner") === null ||
            localStorage.getItem("showCookieBanner") === false,
        acceptCookie() {
            this.showCookieBanner = !this.showCookieBanner;
            localStorage.setItem("showCookieBanner", true);
        },
    };
}
