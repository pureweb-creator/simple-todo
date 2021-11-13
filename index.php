<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            background: #f0ffff;
            margin: 0;
            padding: 0;
            font-family: 'Inconsolata', monospace;
        }
        ul,li{
            list-style: none;
            margin: 0;
            padding: 0;
        }
        main{
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
            margin-top: 100px;
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 2px 2px 50px #ccc;
        }

        .todo__item{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 10px;
            background: bisque;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .todo__delete{
            text-decoration: none;
            color: #000;
            background: #fff;
            display: inline-block;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 25px;
            border-radius: 100px;
        }


        .todo__add-form{
            display: none;
            margin-bottom: 15px;
        }

        .todo__add-form.active{
            display: block;
        }

        .todo__add-btn{
            background: azure;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            cursor: pointer;
            border: none;

            margin-bottom: 15px;
        }

        .mb0{
            margin-bottom: 0;
        }

        .todo__input{
            outline: none;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid silver
        }
    </style>
</head>
<body>
    <main>
        <section id="app" class="todo">
            <h1>Список дел</h1>
            <todo-list list="pages" title="Срочные задачи"></todo-list>
            <todo-list list="news" title="Другие задачи"></todo-list>
        </section>

        <script type="text/x-template" id="todo-list-template">
            <div>
                <h3>{{title}}</h3>
                <ul class="todo__list">
                    <li class="todo__item" v-for="(item, index) in json">{{item.title}} <a href="#!" class="todo__delete" :id="item.id" @click="del(item)">x</a></li>
                </ul>
                <p v-if="isEmpty">{{ text.emptyList }}</p>
                <span @click="toggleClass()" class="todo__add-btn">Добавить задачу +</span>
                <form :class="{active: isActive}" class="todo__add-form " action="todo/add.php" method="GET" @submit.prevent="addTask">
                    <input class="todo__input" type="text" name="task" placeholder="Помыть посуду" v-model="task">
                    <button class="todo__add-btn mb0" type="submit">Добавить +</button>
                    <p class="help">{{ text.error }}</p>
                </form>
            </div>
        </script>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="js/main.js"></script>
</body>
</html>