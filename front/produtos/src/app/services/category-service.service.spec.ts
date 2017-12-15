import { TestBed, inject } from '@angular/core/testing';

import { CategoryServiceService } from './category-service.service';

describe('CategoryServiceService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [CategoryServiceService]
    });
  });

  it('should be created', inject([CategoryServiceService], (service: CategoryServiceService) => {
    expect(service).toBeTruthy();
  }));
});
