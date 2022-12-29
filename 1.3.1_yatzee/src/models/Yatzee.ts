// import { every } from "rxjs";
import { Dice } from "src/models/Dice";

export class Yatzee {
    diceNumber: number = 5;
    dices: Dice[] = [];
    rounds: number = 3;
    turns: number = this.rounds;

    constructor() {
        let i: number = 0;
        while (i < this.diceNumber) {
            this.dices[i] = new Dice();
            this.dices[i].lockDice();
            i++;
        }
    };

    public start() {
        if (this.turns > 0) {
            let i: number = 0;
            while (i < this.diceNumber) {
                if (this.dices[i] != undefined && this.dices[i].diceLocked) {
                    if (this.turns === this.rounds) {
                        this.dices[i].diceLocked = false;
                        this.dices[i].rollDice();
                    }
                }
                else {
                    this.dices[i] = new Dice();
                    this.dices[i].rollDice();
                }
                i++;
            }
        }
        if (this.turns === 0) {
            const mess: string = 'Vos ' + this.rounds + ' tours sont passés !!!';
            alert(mess);
        }
        else {
            this.turns--;
        }
    }

    public reset() {
        this.turns = this.rounds;
        let i: number = 0;
        while (i < this.diceNumber) {
            // this.dices[i].diceLocked = false;
            this.dices[i].diceImage = 'assets/dices/' + 1 + '.png';
            this.dices[i].lockDice();
            i++;
        }
    }
}