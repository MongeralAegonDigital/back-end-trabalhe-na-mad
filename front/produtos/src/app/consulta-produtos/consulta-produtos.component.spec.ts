import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConsultaProdutosComponent } from './consulta-produtos.component';

describe('ConsultaProdutosComponent', () => {
  let component: ConsultaProdutosComponent;
  let fixture: ComponentFixture<ConsultaProdutosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConsultaProdutosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConsultaProdutosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
