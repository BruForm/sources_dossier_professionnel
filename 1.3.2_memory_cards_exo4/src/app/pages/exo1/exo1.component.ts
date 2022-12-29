import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-exo1',
  templateUrl: './exo1.component.html',
  styleUrls: ['./exo1.component.scss']
})
export class Exo1Component implements OnInit {

  private _games: string[] = ['Elden Ring', 'Zelda', 'Mario', 'Sonic', 'Castlevania']
  private _gamesInCard: string[] = [];
  private _nbGamesInCard: number = 0;

  constructor() {
  }

  ngOnInit(): void {
  }


  public get games(): string[] {
    return this._games;
  }


  public get gamesInCard(): string[] {
    return this._gamesInCard;
  }

  
  public get nbGamesInCard() : number {
    return this._nbGamesInCard
  }
  

  public addToCard(game: string): void {
    this._gamesInCard.push(game);
    this._nbGamesInCard++;
  }

  public deleteFromCard(game: string): void {
    this._gamesInCard.splice(this._gamesInCard.indexOf(game),1);
          
    this._nbGamesInCard--;
  }

}
