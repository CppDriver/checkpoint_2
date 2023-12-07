import { Component } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';

@Component({
  selector: 'app-navigation-bar',
  templateUrl: './navigation-bar.component.html',
  styleUrls: ['./navigation-bar.component.css']
})
export class NavigationBarComponent {
  username = '';
  loggedIn = false;
  constructor(private authService: AuthService) {
    this.username = authService.getUserName();
    this.loggedIn = authService.isAuthenticated();
  }
  
  onLogout() {
    this.authService.logout();
    this.username = '';
    this.loggedIn = false;
  }
}
