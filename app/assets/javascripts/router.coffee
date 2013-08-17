Todos.Router.map ->
  this.resource 'todos', { path: '/' }, ->
    this.route 'active'
    this.route 'completed'

Todos.TodosIndexRoute = Ember.Route.extend
  model: ->
    Todos.Todo.find()

Todos.TodosActiveRoute = Ember.Route.extend
  model: ->
    return Todos.Todo.filter (todo) ->
      if !todo.get('isCompleted')
      	return true

  renderTemplate: (controller) ->
    this.render('todos/index', {controller: controller});

Todos.TodosCompletedRoute = Ember.Route.extend
  model: ->
    return Todos.Todo.filter (todo) ->
      if todo.get('isCompleted')
      	return true

  renderTemplate: (controller) ->
    this.render('todos/index', {controller: controller});
