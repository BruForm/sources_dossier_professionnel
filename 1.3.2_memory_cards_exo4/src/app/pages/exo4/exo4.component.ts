import { Component, OnInit } from '@angular/core';
import { MemoryCard } from 'src/app/models/MemoryCard';
import { MemoryConstructor } from 'src/app/models/MemoryConstructor';


@Component({
  selector: 'app-exo4',
  templateUrl: './exo4.component.html',
  styleUrls: ['./exo4.component.scss']
})
export class Exo4Component implements OnInit {

  game: MemoryConstructor;
  cards: MemoryCard[] = [];

  constructor() {
    this.game = new MemoryConstructor();

    this.cards = this.game.createGame(20);

  }

  ngOnInit(): void {
  }

}
