<?php
// Initialize the session
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <title>TEST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <script type="text/javascript" src="../domain_url.js"></script>
    <style>
    </style>

</head>

<body>
    <div id="app">
        <v-app id="inspire">
            <v-content  >


                <v-container fluid style="height: 100%;" class="grey lighten-4">
                    <v-row justify="center">
                        <v-col cols="12">

                         <!-- start looping the array -->
                           <div v-for="abc,index in array_data_customer"> 
                            
                           <!-- looping content -->

                                    <v-card :key="abc.c_id" height="80px" width="700px">
                                        <br>
                                        <v-row>&nbsp;&nbsp;&nbsp;
                                        <v-col md="8">
                                         &nbsp;&nbsp;{{abc.c_name}} &nbsp;  &nbsp; {{abc.c_email}}
                                        </v-col>
                                        <div>
                                        <v-btn depressed color="primary" @click="open_dialog(abc.c_id,abc.c_name,abc.c_email)">
                                            Edit
                                        </v-btn>
                                        <v-btn depressed color="error" @click="delete2(index)">
                                            Delete
                                        </v-btn></div>
                                        </v-row>
                                    </v-card>
                                    <br/>

                                    <!-- can add button here  -->

                           <!-- looping content end -->

                           </div>
                           <!-- looping end -->
    
                        </v-col>
                    </v-row>
                    <v-dialog v-model="edit_dialog" width="500">
                        <v-card>
                            <v-card-title>Edit</v-card-title>
                            <v-card-text>
                                <!-- put veutify textfield here, name and email -->
                                <v-text-field v-model="c_name_edit_text_field" label="name"></v-text-field>
                                <v-text-field v-model="c_email_edit_text_field" label="email"></v-text-field>

                            </v-card-text>
                            <v-card-actions>
                            <div flex="right">
                            <v-btn color="primary" depressed @click="close">Cancel</v-btn>
                            <v-btn color="primary" depressed @click="save()">Save</v-btn>
                            </div>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-container>

            </v-content>


        </v-app>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: () => ({
            
                array_data_customer: [
                    { c_id: '1', c_name: 'aab', c_email: 'aab@gmail.com'},
                    { c_id: '2', c_name: 'asd', c_email: 'asd324@gmail.com' },
                    { c_id: '3', c_name: 'Tan', c_email: 'asseew323@gmail.com'},
                    { c_id: '4', c_name: 'YY', c_email: 'assee@gmail.com' },
                    { c_id: '5', c_name: 'GGe', c_email: 'xxxeas@hotmail.com'},
                ],

                edit_dialog:false,
                c_id_edit_text_field:'',
                c_name_edit_text_field:'',
                c_email_edit_text_field:'',

                
                



            }),
            
            
            
            
            methods:{
                delete_customer: function(c_id) {
                this.array_data_customer.splice(c_id, 1);
            },
            delete1(c_id){
                    console.log(c_id)
                    //looping checking all one by one
                    for(var i=0; i< this.array_data_customer.length; i++){
                        if(this.array_data_customer[i].c_id==c_id){
                            console.log("abc")
                            this.array_data_customer.splice(i, 1);
                        }
                    }
                },
                delete2(index){
                    //__from_data___remove_array_index
                    this.array_data_customer.splice(index, 1);
                },
                
                open_dialog(c_id,c_name,c_email){
                    //open dialog
                    this.edit_dialog=true;


                    //set variable for edit_field
                    this.c_id_edit_text_field=c_id;
                    this.c_name_edit_text_field=c_name;
                    this.c_email_edit_text_field=c_email;


                },
                close(){
                    this.edit_dialog=false;
                },
                save(){
                      //looping checking all one by one
                      for(var i=0; i< this.array_data_customer.length; i++){
           
                        if(this.array_data_customer[i].c_id==this.c_id_edit_text_field){
                            this.array_data_customer[i].c_name=this.c_name_edit_text_field;
                            this.array_data_customer[i].c_email=this.c_email_edit_text_field;
                        }
                    }

                    this.edit_dialog=false
                }
                
            },
            created() {
               
            },
            watch: {
        
            },
            computed: {

            },
            
            
        })
    </script>
</body>

</html>