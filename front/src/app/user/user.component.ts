import { Component, OnInit } from '@angular/core';
import { UserService } from './user.service';
import { User } from './user';
import { Address } from '../address/address';
import { UserData } from './user-data/user-data';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {
  users: User[] = [
    new User(
      15374469754, 
      'Nome', 
      'email@email.com', 
      '12345678', 
      '2126064754', 
      '01/01/2010', 
      new Address(24436790, 'Rua tal', 30, '', '', 'Cidade', 'RJ'), 
      new UserData('265279810', '01/01/2010', 'Detran', 'Solteiro', 'Empregado', 'Veus', 'Dev', '4500')
    )
  ];

  constructor(
    private _userService: UserService
  ) { }

  ngOnInit() {
    this.getUsers();
  }

  getUsers() {
    this._userService.getUsers()
    .then(users => this.users);
  }

  create(user: User) {
    this.users.push(user);
  }

}
