import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-media-page',
  templateUrl: './media-page.component.html',
  styleUrls: ['./media-page.component.css']
})
export class MediaPageComponent implements OnInit{
  imageUrl: string = '';

  constructor(private route: ActivatedRoute) {}

  ngOnInit() {
    this.imageUrl = decodeURIComponent(this.route.snapshot.paramMap.get('url')!);
  }
}
