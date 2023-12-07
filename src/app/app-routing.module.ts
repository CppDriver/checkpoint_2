import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomePageComponent } from './pages/home-page/home-page.component';
import { LoginPageComponent } from './pages/login-page/login-page.component'
import { LoginComponent } from './components/login/login.component';
import { SignupComponent } from './components/signup/signup.component';
import { MediaPageComponent } from './pages/media-page/media-page.component';
import { UserPageComponent } from './pages/user-page/user-page.component';
import { authenticationGuard } from './guards/authentication.guard';

const routes: Routes = [
  { path: '', component: HomePageComponent },
  { path: 'auth', component: LoginPageComponent,
      children: [
        { path: 'login', component: LoginComponent },
        { path: 'signup', component: SignupComponent },
      ]
  },
  { path: 'user', component: UserPageComponent, canActivate: [authenticationGuard]},
  { path: 'media/:url', component: MediaPageComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
