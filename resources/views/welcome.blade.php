@extends('shopify-app::layouts.default')

@section('styles')
@endsection

@section('content')
    <!-- You are: (shop domain name) -->
    {{-- <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>

    <div>
        @if ($setting == null)
            <button onclick="themeCreate()">Create Theme File</button>
        @else
            <button onclick="themeDelete()">Delete Theme File</button>
        @endif
    </div><br>

    <div>
        <button onclick="scriptCreate()">Create Script File</button>
        <button onclick="scriptUpdate()">Update Script File</button>
        <button onclick="scriptDelete()">Delete Script File</button>
    </div><br> --}}

    <input type="range" name="query" id="query" min="1" max="500" value="1">

    <input type="checkbox" id="" name="">
    <button id="search" type="button">Search</button>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('tscript.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $.ajax({
            type: "GET",
            url: "http://tes-store-ns.myshopify.com/admin/api/2023-01/collections.json",
            data: "",
            dataType: "json",
            success: function (response) {

            }
        });

        $('#search').click(function(e) {
            e.preventDefault();
            let query = $('#query').val();

            $.ajax({
                type: "GET",
                url: "http://tes-store-ns.myshopify.com/search/suggest.json?q=" + query + "&resources[type]=product&resources[limit]=10&resources[options][fields]=tag",
                data: "",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                }
            });
        });
    </script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        actions.TitleBar.create(app, {
            title: 'Welcome'
        });

        // THEME FUNCTIONS
        function themeCreate() {
            axios
                .post('themes/create')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function themeDelete() {
            axios
                .get('themes/destroy')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        // SCRIPT FUNCTIONS
        function scriptCreate() {
            axios
                .post('scripts/create')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function scriptUpdate() {
            axios
                .post('scripts/update')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function scriptDelete() {
            axios
                .get('scripts/destroy')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
