<template>
	<div class="card">
		<div class="card-header">
			<strong>Today Reminder List &#x1f4d8;</strong>
		</div>
		<div class="card-body">
			<ul class="list-group list-group-flush">
				<li class="list-group-item" v-for="reminder in reminders" :key="reminder.id">
					<inertia-link :href="$route('reminder.view',{lead:reminder.lead,reminder:reminder})">
						<strong>{{reminder.lead.name}}</strong> <br>
						<p>{{reminder.reminder}}</p>
					</inertia-link>
				</li>
			</ul>
		</div>
	</div>
</template>

<script>
	export default {
		name:"ReminderList",
		props:{
			reminders:Array,
		}
	}
</script>