import {
  Component,
  ViewChild,
  OnInit,
  HostListener
} from '@angular/core';
import { Router, ActivatedRoute, NavigationEnd } from '@angular/router';
import { MatSidenav } from '@angular/material';
import { MenuItem } from '../../interfaces';



@Component({
  selector: 'app-menu-sidenav',
  templateUrl: 'menu-sidenav.component.html',
  styleUrls: ['menu-sidenav.component.scss'],
})
export class MenuSidenavComponent implements OnInit {

  @ViewChild('sidenav') private sidenav: MatSidenav;
  private locationPath: string;
  private elements: MenuItem[] = [
    {
      title: 'Client',
      opened: false,
      elements: [
        {
          title: 'New',
          url: '/client/new'
        }
      ]
    },
  ];

  constructor(
    private router: Router,
    private activatedRoute: ActivatedRoute
  ) {}

  ngOnInit() {
    this.router.events.subscribe(event => {
      if (event instanceof NavigationEnd) {
        this.locationPath = event.url;

        for (let i = 0; i < this.elements.length; i++) {
          const element = this.elements[i];
          if (element.elements) {

            for (let j = 0; j < element.elements.length; j++) {
              const childElement = element.elements[j];

              if (childElement.url === event.url) {
                element.opened = true;
              }

            }
          }
        }
      }
    });
  }

  @HostListener('document:keydown', ['$event'])
  handleKeyboardEvent(event: KeyboardEvent) {
    const key = event.keyCode;
    if (key === 27) {
      this.sidenav.close();
    }
  }

  public toggleMenu(item: MenuItem) {
    item.opened = !item.opened;
  }
}
