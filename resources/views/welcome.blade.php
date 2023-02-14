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


@endsection

@section('scripts')
    @parent

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
