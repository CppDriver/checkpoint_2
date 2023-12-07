import type { ActivatedRouteSnapshot, CanActivateFn, RouterStateSnapshot } from '@angular/router';
import { AuthService } from '../services/auth.service';
import { inject } from '@angular/core';
import { tap } from 'rxjs';

// export const authenticationGuard: CanActivateFn = (route: ActivatedRouteSnapshot, state: RouterStateSnapshot) => {
//   (inject(AuthService).isAuthenticated() as any).pipe(tap((isAuthenticated: boolean) => {
//     if (isAuthenticated) {
//       return true;
//     }
//   }, () => {
//     return false;
//   }));
// };

export const authenticationGuard: CanActivateFn = (route: ActivatedRouteSnapshot, state: RouterStateSnapshot) => {
  if(inject(AuthService).isAuthenticated())
  {
    return true;
  }
  return false;
};
