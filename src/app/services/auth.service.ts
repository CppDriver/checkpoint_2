import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import * as jwt_decode from 'jwt-decode';
import { Router } from '@angular/router';
import { first, firstValueFrom } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  constructor(private http: HttpClient, private router: Router) { }

  isAuthenticated(): boolean {
    let token = localStorage.getItem('token');
    if(token)
    {
      const decodedToken = jwt_decode.jwtDecode(token);
      if(decodedToken && typeof decodedToken !== 'string' && decodedToken.exp !== undefined)
      {
        const expirationDate = new Date(0);
        expirationDate.setUTCSeconds(decodedToken.exp);
        if(expirationDate < new Date())
        {
          localStorage.removeItem('token');
          localStorage.removeItem('username');
          return false;
        }
        else
        {
          return true;
        }
      }
    }
    return false;
  }

  getUserName(): string {
    let username = localStorage.getItem('username');
    if(username)
    {
      return username;
    }
    else
    {
      return '';
    }
  }

  async login(loginData: FormData) {
    var response = await firstValueFrom(this.http.post('http://localhost:5080/Auth/Login', loginData));
        // console.log(response);
        localStorage.setItem('token', JSON.parse(JSON.stringify(response)).token);
        localStorage.setItem('username', JSON.parse(JSON.stringify(response)).username);
        this.router.navigate(['/user']);
  }

  async register(registerData: FormData) {
    var response = await firstValueFrom(this.http.post('http://localhost:5080/Auth/Register', registerData));
    console.log(response);
    if(JSON.parse(JSON.stringify(response)).msg == 'registered')
    {
      this.router.navigate(['/auth/login']);
    }
  }

  logout() {
    localStorage.removeItem('token');
    localStorage.removeItem('username');
    this.router.navigate(['/auth/login']);
  }

  async changePassword(oldPassword: string, newPassword: string): Promise<boolean> {
    let changePasswordData = new FormData();
    changePasswordData.append('username', this.getUserName());
    changePasswordData.append('oldPassword', oldPassword);
    changePasswordData.append('newPassword', newPassword);
    var response = await firstValueFrom(this.http.post('http://localhost:5080/Auth/ChangePassword', changePasswordData));
    console.log(response);
    if(JSON.parse(JSON.stringify(response))?.msg == 'Password changed')
    {
      return true;
    }
    return false;
  }

  async deleteAccount(password: string): Promise<boolean> {
    let deleteAccountData = new FormData();
    deleteAccountData.append('username', this.getUserName());
    deleteAccountData.append('password', password);
    var response = await firstValueFrom(this.http.post('http://localhost:5080/Auth/DeleteAccount', deleteAccountData));
    console.log(response);
    if(JSON.parse(JSON.stringify(response)).msg == 'Account deleted')
    {
      return true;
    }
    return false;
  }
}
