<template>
    <div class="component-root">
        <div class="map" ref="map"></div>

        <div class="dropdown-menu" id="maps-context-menu">
            <span class="dropdown-item" v-on:click="onClickContextPlaceMarker">Place Marker</span>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
        },

        data: function() {
            return {
                map: null,
            }
        },

        mounted: function () {
            this.initMap();

            this.contextmenu = $('#maps-context-menu'); 
            this.contextmenu.hide();
        },

        methods: {
            initMap: function () {
                this.map = new google.maps.Map(this.$refs.map, {
                    center: {lat: 0, lng: 0},
                    zoom: 2
                });

                this.map.addListener('rightclick', this.onRightClick);
            },

            onRightClick: function (data) {
                this.lat = data.latLng.lat();
                this.lng = data.latLng.lng();

                let position = $(this.$el).position();
                let x = position.left + data.pixel.x;
                let y = position.top + data.pixel.y;

                this.showContextMenu(x, y);
            },

            onClickContextPlaceMarker: function () {
                this.placeMarker(this.lat, this.lng);
                this.closeContextMenu();
            },

            placeMarker: function (lat, lng) {
                var marker = new google.maps.Marker({
                    map: this.map,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    position: {lat: lat, lng: lng}
                });
            },

            showContextMenu: function (x, y) {
                this.contextmenu.css({
                    display: "block",
                    left: x,
                    top: y,
                });
            },

            closeContextMenu: function () {
                this.contextmenu.css({
                    display: "none"
                });
            },

        }
    }
</script>

<style scoped>
    .component-root,
    .map {
        width: 100%;
        height: 100%;
    }
</style>