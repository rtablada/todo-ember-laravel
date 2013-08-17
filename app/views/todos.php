<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ember.js • TodoMVC</title>
    <link rel="stylesheet" href="<?= asset('assets/application.css') ?>">
  </head>
  <body>
    <script type="text/x-handlebars" data-template-name="todos">
      <section id="todoapp">
        <header id="header">
          <h1>todos</h1>
          {{view Ember.TextField id="new-todo" placeholder="What needs to be done?" valueBinding="newTitle" action="createTodo"}}
        </header>

          <section id="main">
            {{outlet}}

            {{view Ember.Checkbox id="toggle-all" checkedBinding="allAreDone"}}
          </section>

          <footer id="footer">
            <span id="todo-count">
              <strong>{{remaining}}</strong> {{inflection}} left
            </span>
            <ul id="filters">
              <li>
                {{#linkTo 'todos.index' activeClass="selected"}}All{{/linkTo}}
              </li>
              <li>
                {{#linkTo 'todos.active' activeClass="selected"}}Active{{/linkTo}}
              </li>
              <li>
                 {{#linkTo 'todos.completed' activeClass="selected"}}Completed{{/linkTo}}
              </li>
            </ul>

            {{#if hasCompleted}}
              <button id="clear-completed" {{action "clearCompleted"}}>
                Clear completed ({{completed}})
              </button>
            {{/if}}
          </footer>
      </section>

      <footer id="info">
        <p>Double-click to edit a todo</p>
      </footer>
    </script>

    <script type="text/x-handlebars" data-template-name="todos/index">
      <ul id="todo-list">
        {{#each controller itemController="todo"}}
          <li {{bindAttr class="isCompleted:completed isEditing:editing"}}>
            {{#if isEditing}}
              {{view Todos.EditTodoView valueBinding="title"}}
            {{else}}
              {{view Ember.Checkbox checkedBinding="isCompleted" class="toggle"}}
              <label {{action "editTodo" on="doubleClick"}}>{{title}}</label><button {{action "removeTodo"}} class="destroy"></button>
            {{/if}}
          </li>
        {{/each}}
      </ul>
    </script>

    <?= javascript_include_tag() ?>
  </body>
</html>
