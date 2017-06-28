<html>
    <head>
        <title>Vue js</title>
        <script src="https://unpkg.com/vue"></script>    
    </head>
    <body>
        <div id="app">
            <p> @{{ message }}</p>
            <input type="text" v-model="binding">
            @{{ binding }}
        </div>
        <script src="{{ asset('js/vue.js') }}"></script>
    </body>
</html>