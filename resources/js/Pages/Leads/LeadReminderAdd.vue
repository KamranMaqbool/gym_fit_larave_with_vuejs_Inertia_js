<template>
    <Layout>
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h4>
                        <inertia-link :href="$route('lead.list')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        <inertia-link :href="$route('lead.view',{lead:lead})">Leads Details</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Reminder Add
                    </h4>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-6">
            		<div class="card">
            			<div class="card-header">
            				Add Reminder &#x2795;
            			</div>
            			<div class="card-body">
            				<form onSubmit.prevent="handleSubmit" accept-charset="utf-8">
            					<div class="form-group">
            						<label for="reminder">Reminder</label>
            						<textarea name="reminder" class="form-control" v-model="reminder.reminder"></textarea>
            					</div>
            					<div class="form-group">
            						<label>Reminder Date</label>
            						<input name="date" type="date" v-model="reminder.reminder_date" class="form-control" />
            					</div>

            					<button class="btn btn-success">Save</button>
            				</form>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../shared/Layout.vue'
export default {
    name: 'AddReminder',
    components: {
        Layout
    },
    props:{
    	lead:Object,
    },
    data(){
    	return {
    		reminder:{
    			reminder:'',
    			reminder_date:'',
    		}
    	}
    },
    methods:{
    	handleSubmit(){

    	}
    }
}

</script>
