<template>
    <div>
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
        <div v-if="reminder.id">
            <button @click="handleAddNew" class="btn btn-success">Add New</button>
            <!-- <button @click="handleClose" class="btn btn-danger">Close &#x2694;</button> -->
            <inertia-link class="btn btn-danger" :href="$route('reminder.note',{lead:lead,reminder:mainReminder})">Close &#x2694;</inertia-link>

        </div>
        <div v-else>
            <button @click="handleSubmit" class="btn btn-success">Save</button>
        </div>
    </div>
</template>
<script>
export default {
    name: "ReminderAddForm",
    props: {
        mainReminder: Object,
        lead: Object,
    },
    data() {
        return {
            reminder: {
                reminder: '',
                reminder_date: '',
            }
        }
    },
    created() {
        this.reminder = this.mainReminder;
    },
    methods: {
        handleSubmit(postData) {
            this.$emit('reminderOnSubmit', this.reminder)
        },
        handleAddNew() {
            debugger
            const data = {
                reminder_id : this.reminder.id
            }
            this.$inertia.post(route('reminder.update'),data);
            // this.$emit('reminderOnSubmit', this.reminder)
        },
    }
}

</script>
