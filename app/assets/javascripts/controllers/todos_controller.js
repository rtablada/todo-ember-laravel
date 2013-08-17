Todos.TodosController = Ember.ArrayController.extend({
	createTodo: function() {
		var title = this.get('newTitle');
		if (!title.trim())
			return;

		todo = Todos.Todo.createRecord({
			title: title,
			isCompleted: false
		});

		this.set('newTitle', '');

		todo.save();
	},

	remaining: function() {
		return this.filterProperty('isCompleted', false).get('length');
	}.property('@each.isCompleted'),

	inflection: function() {
		remaining = this.get('remaining');
		return remaining === 1 ? 'item' : 'items';
	}.property('remaining'),
});
