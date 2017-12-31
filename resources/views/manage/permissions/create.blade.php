@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New Permission</h1>
      </div>
    </div>
    <hr class="m-t-0">
    <div class="columns">

      <div class="column">

        <div class="field">
          <b-radio v-model="permission_type" native-value="basic">Basic Permission</b-radio>
          <b-radio v-model="permission_type" native-value="advanced" >CURD Permission</b-radio>
        </div>
        <form action="{{route('permissions.store')}}" method="POST" >
          {{csrf_field()}}
          <div v-if="permission_type == 'basic'">
            <div class="field">
              <label for="display_name">Name:</label>
              <p class="control">
                <input class ="input" type="text" name="display_name" id="display_name">
              </p>
              </div>
            <div class="field">
              <label for="name">Slug Name:</label>
              <p class="control">
                <input class ="input" type="text" name="name" id="name">
              </p>
            </div>
            <div class="field">
              <label for="description">Description:</label>
              <p class="control">
                <input class ="input" type="text" name="description" id="description">
              </p>
            </div>
          </div>

          <div v-if="permission_type == 'advanced'">
            <div class="field">
              <label for="resource">Name:</label>
              <p class="control">
                <input class ="input" type="text" name="resource" id="resource" v-model="resource">
              </p>
            </div>
            <div class="columns">
              <div class="column">
                <div class="field">
                  <b-checkbox v-model="curd_check_box" native-value="create" name="curd_box[]">Create</b-checkbox>
                </div>
                <div class="field">
                  <b-checkbox v-model="curd_check_box" native-value="update" name="curd_box[]">Updaet</b-checkbox>
                </div>
                <div class="field">
                  <b-checkbox v-model="curd_check_box" native-value="read" name="curd_box[]">Read</b-checkbox>
                </div>
                <div class="field">
                  <b-checkbox v-model="curd_check_box" native-value="delete" name="curd_box[]">Delete</b-checkbox>
                </div>
              </div>
              <div class="column">
                <table class="table is-narrow is-fullwidth is-hoverable">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Slug </th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody v-if="resource.length >= 3">
                    <tr v-for="curd in curd_check_box">
                      <th v-text="curdName(curd)"></th>
                      <th v-text="curdSlug(curd)"></th>
                      <th v-text="curdDescription(curd)"></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <button class="button is-primary m-t-15" type="submit">Create Permission</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        permission_type : 'basic',
        resource: '',
        curd_check_box: ['create','update','read','delete']
      },
      methods:{
        curdName: function(item){
          return item.substr(0,1).toUpperCase() + item.substr(1) + " " + this.resource.substr(0,1).toUpperCase() + this.resource.substr(1);
        },
        curdSlug: function(item){
          return item.substr(0,1).toLowerCase() + item.substr(1) + "-" + this.resource.substr(0,1).toLowerCase() + this.resource.substr(1);
        },
        curdDescription: function(item){
          return "Allow to " + item +" " +this.resource;
        }

      }
    });
  </script>
@endsection