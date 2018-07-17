import { TestBed, inject } from '@angular/core/testing';

import { ProfessionalDataService } from './professional-data.service';

describe('ProfessionalDataService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ProfessionalDataService]
    });
  });

  it('should be created', inject([ProfessionalDataService], (service: ProfessionalDataService) => {
    expect(service).toBeTruthy();
  }));
});
