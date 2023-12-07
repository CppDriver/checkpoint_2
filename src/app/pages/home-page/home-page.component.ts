import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})
export class HomePageComponent {
  encode(url: string) {
    return encodeURIComponent(url);
  }

  // images: { id: string }[] = [];

  // constructor(private http: HttpClient) {}

  // ngOnInit() {
  //   this.fetchImages();
  // }

  // fetchImages() {
  //   const apiUrl = 'localhost:5000/GetImages';

  //   this.http.get<{ id: string }[]>(apiUrl)
  //   .subscribe(
  //     (data) => {
  //       this.images = data;
  //     },
  //     (error) => {
  //       console.error('Error fetching images:', error);
  //     }
  //   );
  // }
  images: { id: string, author: string, width: number, height: number, url: string, download_url: string}[] = [
  ]
}
