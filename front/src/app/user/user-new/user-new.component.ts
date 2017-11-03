import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { User } from '../user';

@Component({
    selector: 'app-user-new',
    templateUrl: './user-new.component.html',
    styleUrls: ['./user-new.component.css']
})
export class UserNewComponent implements OnInit {
    @Output() createNewUserEvent =  new EventEmitter();
    user = new User();

    constructor() { }

    ngOnInit() { }

    create()
    {
        this.createNewUserEvent.emit(this.user);
    }

}
