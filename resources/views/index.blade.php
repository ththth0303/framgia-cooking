<html>
<head>
    <title>Vue js</title>
    <script src="https://unpkg.com/vue"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.js"></script>
    <script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>   
</head>
<body>
    <div id="app">
        <p> @{{ message }}</p>
        <input type="text" v-model="binding">
        <p v-once>@{{ binding }}</p>
        <p v-html="binding"></p>
        <p v-bind:disabled="status" v-bind:class="th">@{{ binding }}</p>
        <p v-bind:id="th" v-bind:class="th">@{{ binding }}</p>
        <p v-bind:id="th + ' thắng'" v-bind:class="th">@{{ binding.split('').reverse().join('') }}</p>
        <p v-if="seen" v-html="binding"></p>
        <todo-item></todo-item>
        <form action="" v-on:submit.prevent="submit">
            <input type="text">
            <input type="submit">
        </form>
        <p >@{{ submit }}</p>
        <div class="thth" v-bind:class="classObject" >1234567890-</div>
        <div v-if="hello" >1234567890-
            <h1>v-if</h1>
        </div>
        <div v-else="ok" >1234567890-
            <h1>v-else</h1>
        </div>
        <input type="text" v-model.trim="hello">
        <h1>@{{hello1}}</h1>
        <div v-show="ok" >1234567890-
            <h1>v-show</h1>
        </div>
        <ol>
            <li v-for="arr in toArray">@{{ arr }}</li>
        </ol>
    </div>
    <div id="watch-example">
        <p>
            Ask a yes/no question:
            <input v-once v-model="question">
        </p>
        <p>@{{ answer }}</p>
    </div>
    <div id="todo-list-example">
        <input
            v-model="newTodoText"
            v-on:keyup.enter="addNewTodo"
            placeholder="Add a todo"
        >
        <ul>
            <li
                is="todo-item"
                v-for="(todo, index) in todos"
                v-bind:title="todo"
                v-on:remove="todos.splice(index, 1)"
            ></li>
        </ul>
    </div>
    <div id="example-2">
        <!-- `greet` is the name of a method defined below -->
        <button v-on:click="greet">Greet</button>
        <button v-on:click="warn('Form cannot be submitted yet.', $event)">Submit</button>
        <textarea v-model="message" placeholder="add multiple lines"></textarea>
        <p style="white-space: pre-line">@{{ message }}</p>
    </div>
<script src="{{ asset('js/vue.js') }}"></script>
</body>
</html>