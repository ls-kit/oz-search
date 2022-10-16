@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
    <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>

    @if ($setting == null)
        <button onclick="themeCreate()">Make File</button>
    @else
        <button onclick="themeDelete()">Delete File</button>
    @endif
@endsection

@section('scripts')
    @parent

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        actions.TitleBar.create(app, {
            title: 'Welcome'
        });

        function themeCreate() {
            axios
                .post('/theme/create')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function themeDelete() {
            axios
                .get('/theme/delete')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
