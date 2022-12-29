import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  private _toto: string = 'Bonjour...';

  constructor() { }

  ngOnInit(): void {

    setTimeout(() => {
      this._toto = '... au revoir !';
    }, 5000);
  }

  get toto(): string {
    return this._toto;
  }

}
