import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClientRegistrationComponent } from './client-registration.component';

describe('ClientRegistrationComponent', () => {
  let component: ClientRegistrationComponent;
  let fixture: ComponentFixture<ClientRegistrationComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClientRegistrationComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClientRegistrationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
