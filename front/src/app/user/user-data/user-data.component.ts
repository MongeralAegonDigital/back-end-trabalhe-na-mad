import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-user-data',
  templateUrl: './user-data.component.html',
  styleUrls: ['./user-data.component.css']
})
export class UserDataComponent implements OnInit {
  @Input() user;

  constructor() { }

  ngOnInit() {
  }

}
