<template>
    <form @submit.prevent="handleSubmit">
        <div class="form-group">
            <label for="reminder">Reminder</label>
            <textarea name="reminder" class="form-control" v-model="reminder.reminder"></textarea>
            <div class="error" v-if="$page.errors.reminder">{{ $page.errors.reminder[0] }}</div>
        </div>
        <div class="form-group">
            <label>Reminder Date</label>
            <input name="date" type="date" v-model="reminder.reminder_date" class="form-control" />
            <div class="error" v-if="$page.errors.reminder_date">{{ $page.errors.reminder_date[0] }}</div>
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</template>
<script>
export default {
	name:"ReminderAddForm",
    props:{
        mainReminder:Object,
    },
	 data(){
    	return {
    		reminder:{
    			reminder:'',
    			reminder_date:'',
    		}
    	}
    },
    created(){
        this.reminder = this.mainReminder;
    },
    methods:{
        handleSubmit(postData){
            this.$emit('reminderOnSubmit',this.reminder)
        }
    }
}

</script>
