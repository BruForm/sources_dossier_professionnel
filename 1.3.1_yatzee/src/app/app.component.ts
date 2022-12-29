import { style } from '@angular/animations';
import { Component } from '@angular/core';
import { Dice } from 'src/models/Dice';
import { Yatzee } from "src/models/Yatzee";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'Yatzee';

  yatzee: Yatzee = new Yatzee();

  Up: boolean = true;

  btUp() {
    this.Up = true;
  }
  btDown() {
    this.Up = false;
  }

}
