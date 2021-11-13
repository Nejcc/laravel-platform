<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-12">
              <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                  <a class="nav-link" @click.prevent="setActive('roles')" :class="{ active: isActive('roles') }"
                     href="#roles">Roles</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" @click.prevent="setActive('user')" :class="{ active: isActive('user') }"
                     href="#user" aria-current="page">Users</a>
                </li>
              </ul>
              <div class="alert alert-success mt-4" v-if="success" role="alert">
                Saved!
              </div>
              <div class="tab-content py-3" id="myTabContent">
                <div class="tab-pane fade" :class="{ 'active show': isActive('roles') }" id="roles">

                  <div class="card">
                    <div class="card-header">
                      Roles
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Select role</label>
                        <select class="form-control" v-model="role" id="exampleFormControlSelect1">
                          <option v-for="role in roles_permissions" v-bind:value="role" v-if="role.id !== 1">
                            {{ role.name }}
                          </option>
                        </select>
                      </div>

                      <multiselect
                          class="mt-3"
                          :options="permissions"
                          v-model="selectedPermissionsRole"
                          :close-on-select="false"
                          :clear-on-select="false"
                          label="name"
                          :multiple="true"
                          :taggable="true"
                          track-by="name"
                          :preselect-first="false">
                      </multiselect>

                      <button type="button" @click="saveRolePermission()" class="btn mt-3 btn-success">Shrani</button>
                    </div>
                  </div>

                </div>
                <div class="tab-pane fade" :class="{ 'active show': isActive('user') }" id="user">
                  <div class="card">
                    <div class="card-header">
                      Roles
                    </div>
                    <div class="card-body">
                      <multiselect v-model="selectedUser" :options="users" :searchable="true"
                                   :close-on-select="true"
                                   label="name" track-by="name"
                                   :show-labels="false" placeholder="Pick a value"></multiselect>


                      <multiselect
                          class="mt-3"
                          :options="permissions"
                          v-model="selectedPermissions"
                          :close-on-select="false"
                          :clear-on-select="false"
                          label="name"
                          :multiple="true"
                          :taggable="true"
                          track-by="name"
                          :preselect-first="false">

                      </multiselect>

                      <button type="button" @click="savePermission()" class="btn mt-3 btn-success">Shrani</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['roles_permissions', 'permissions', 'users'],
    watch: {
        selectedUser() {
            this.selectedPermissions = this.selectedUser.permissions
        },
        role() {
            this.selectedPermissionsRole = this.role.permissions
        }
    },
    data() {
        return {
            addRole: false,
            role: null,
            selectedUser: [],
            activeItem: 'roles',
            onlyPermissionsIds: [],
            changedPermissions: [],
            selectedPermissions: [],
            selectedPermissionsRole: [],
            success:false,
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        hasPerm(perm) {
            this.role.permissions.forEach(function (item) {
                console.log(item.id === perm.id)
                if (item.id === perm.id) {
                    return true
                }
            })
            return false
        },
        isActive(menuItem) {
            return this.activeItem === menuItem
        },
        setActive(menuItem) {
            this.activeItem = menuItem
        },
        savePermission() {
            const url = `/admin/user/permissions/syncUserPermissions`;
            return new Promise(resolve => {
                window.axios.post(url, {
                    'user': this.selectedUser.id,
                    'perms': this.selectedPermissions,
                }, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'app-token': 'U0xYT1VaV1RXU1ZUUkxDQjBRMzM3RDBEWUhHSVBG',
                    }
                }).then(response => {
                    this.success = true
                })
                    .catch(error => {

                    });
            })
        },
        saveRolePermission() {
            const url = `/admin/user/permissions/syncRolePermissions`;
            return new Promise(resolve => {
                window.axios.post(url, {
                    'role': this.role.id,
                    'perms': this.selectedPermissionsRole,
                }, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'app-token': 'U0xYT1VaV1RXU1ZUUkxDQjBRMzM3RDBEWUhHSVBG',
                    }
                }).then(response => {
                    this.success = true
                })
                    .catch(error => {

                    });
            })
        },

    },
}
</script>
