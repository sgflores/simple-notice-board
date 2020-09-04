<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Notice Board</title>

    <?php require_once( realpath(dirname(__FILE__) . '/includes/css.php') ); ?>

    <style>
       [v-cloak] {display: none}
    </style>

</head>
<body>

    <?php require_once( realpath(dirname(__FILE__) . '/includes/header.php') ); ?>

    <main role="main" class="container" id="app" v-cloak>
    <div class="jumbotron" v-for="list in stories" :key="list.id">
        <h1>{{list.name}}</h1>
        <div v-html="list.content"></div>
    </div>
    </main>

    <?php require_once( realpath(dirname(__FILE__) . '/includes/script.php') ); ?>

    <!-- production version, optimized for size and speed -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                stories: [],
            },
            methods: {
                loadStories() {
                    var vm = this;
                    axios.get('/api.php')
                    .then(function(response) {
                        console.log(response);
                        vm.stories = response.data;
                    })
                    .catch(function(error) {

                    })
                }
            },
            created() {
                setInterval(this.loadStories, 1000);
            }
        })
    </script>

</body>
</html>