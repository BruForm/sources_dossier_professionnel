import { MemoryCard } from "./MemoryCard";

export class MemoryConstructor {

    // numberOfCards: number; // must be even (pair)

    private _cards: string[] = [
        'test-01-pique-img.png', 
        'test-05-pique-img.png', 
        'test-06-pique-img.png', 
        'test-07-pique-img.png', 
        'test-08-pique-img.png', 
        'test-09-pique-img.png', 
        'test-10-pique-img.png', 
        'test-V-pique-img.png', 
        'test-D-pique-img.png', 
        'test-R-pique-img.png'
    ];
    private _stillUsedCards: number[] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    private _memoryCards: MemoryCard[] = [];

    constructor() {

    }

    public get memoryCards(): MemoryCard[] {
        return this._memoryCards;
    }

    // For 10 cards forced here
    public createGame(nbOfCards: number): MemoryCard[] {

        if (nbOfCards % 2 != 0) {
            alert('Error... The number of cards must be even!')
            return [];
        }
        else {
            let i: number = 0;
            while (i < nbOfCards) {
                let actualCardNb = (Math.floor(Math.random() * ((nbOfCards / 2) - 1 + 1)) + 1) - 1;
                if (this._stillUsedCards[actualCardNb] < 2) {
                    this._memoryCards[i] = new MemoryCard(i, this._cards[actualCardNb]);
                    this._stillUsedCards[actualCardNb]++;
                    i++;
                }
            }
            return this._memoryCards;
        }
    }

    public checkCouple(selectedCard: MemoryCard): void {
        let checks: MemoryCard[] = [];
        for (let card of this._memoryCards) {
            if (card.hasBeenReturned && !card.hasBeenFound) { checks.push(card); }
        }

        if (checks.length === 2) {
            if (checks[0].image === checks[1].image) {
                this._memoryCards[checks[0].id].hasBeenFound = true;
                this._memoryCards[checks[1].id].hasBeenFound = true;
            }
            checks = [];
        }
        if (checks.length === 3) {
            for (let c of checks) {
                if (c.id != selectedCard.id)
                    this._memoryCards[c.id].hasBeenReturned = false;
            }
            checks = [];
        }
    }
}
