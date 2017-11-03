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
    errors: JSON[] = null;
    success: boolean = false;

    constructor(
        private _userService: UserService
    ) { }

    ngOnInit()
    {
        this.getUsers();
    }

    getUsers()
    {
        this._userService.getUsers()
        .then(users => this.users = users)
        .catch(err => console.log(err));
    }

    create(user: User)
    {
        this.errors = null;
        this.success = false;

        this._userService.create(user)
        .then(status => {
            this.getUsers();
            this.success = true;
            console.log(user);
            user = new User();
            console.log(user);
        })
        .catch(err => this.handleError(err.json()));
    }

    private handleError(jsonErrors)
    {
        this.errors = jsonErrors;
    }
}
