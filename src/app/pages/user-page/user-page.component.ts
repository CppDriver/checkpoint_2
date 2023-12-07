import { Component } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-user-page',
  templateUrl: './user-page.component.html',
  styleUrls: ['./user-page.component.css', '../../../styles.css']
})
export class UserPageComponent {
  username: string;
  oldPassword = '';
  newPassword = '';
  password = '';

  constructor(private authService: AuthService, private snackBar: MatSnackBar) {
    this.username = authService.getUserName();
  }
  
  async onChangePassword() {
    let result = await this.authService.changePassword(this.oldPassword, this.newPassword);
    console.log('result = ' + result);
    if(result)
    {
      this.snackBar.open('Password changed successfully', 'Close', {duration: 2000});
    }
    else
    {
      this.snackBar.open('Password change failed', 'Close', {duration: 2000});
    }
    this.oldPassword = '';
    this.newPassword = '';
  }

  async onDeleteAccount() {
    if(await this.authService.deleteAccount(this.password))
    {
      this.snackBar.open('Account deleted successfully', 'Close', {duration: 2000});
      this.authService.logout();
    }
    else
    {
      this.snackBar.open('Account deletion failed', 'Close', {duration: 2000});
    }
    this.password = '';
  }

}
