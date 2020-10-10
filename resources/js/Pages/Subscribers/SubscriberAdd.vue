<template>
	<Layout>
		<div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h1 class="float-left">Packages</h1>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-6">
            		<div class="card">
            			<div class="card-title"></div>
            			<div class="card-body">
            				<subscriber-form :lead="lead" :packages="packages" @SubscriberAdded="handleSubscribeAdd" ></subscriber-form>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
	</Layout>	
</template>

<script>
import Layout from '../../shared/Layout.vue'
import SubscriberForm from './SubscriberForm.vue'
	export default {
		name:"SubscriberAdd",
        props:['lead','packages'],

		components:{
			SubscriberForm,
			Layout
		},

        methods:{
            handleSubscribeAdd(payload){

            }
        }
	}
</script>