import { Component, OnInit } from '@angular/core';
import { UserService } from './user.service';
import { User } from './user';
import { Observable } from 'rxjs/Rx';

import { Address } from '../address/address';
import { UserData } from './user-data/user-data';

@Component({
    selector: 'app-user',
    templateUrl: './user.component.html',
    styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {
  users: User[] = [];
  errors = [];

  constructor(
      private _userService: UserService
  ) { }

  ngOnInit() {
      this.getUsers();
  }

  getUsers() {
      this._userService.getUsers()
      .then(users => this.users = users)
      .catch(err => console.log(err));
  }

  create(user: User) {
      this._userService.create(user)
      .then(status => this.getUsers())
      .catch(err => {
          console.log(err.json());
          this.errors = err.json();
          console.log(this.errors);
      });
      console.log(this.errors);
  }

}
