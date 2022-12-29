export class Dice {
    private value: number = 1;
    private image: string = '';
    private locked: boolean = false;

    constructor() {
        // //Math.floor(Math.random() * (max - min + 1)) + min;
        // this.value = Math.floor(Math.random() * (6)) + 1;
        this.image = 'assets/dices/' + this.value + '.png';
    };

    rollDice() {
        //Math.floor(Math.random() * (max - min + 1)) + min;
        this.value = Math.floor(Math.random() * (6)) + 1;
        this.image = 'assets/dices/' + this.value + '.png';
    }

    lockDice() {
        this.locked = true;
    }

    public get diceValue(): number {
        return this.value;
    }

    public get diceImage(): string {
        return this.image;
    }
    
    public set diceImage(v : string) {
        this.image = v;
    }
    
    public get diceLocked(): boolean {
        return this.locked;
    }

    public set diceLocked(v: boolean) {
        this.locked = v;
    }

}