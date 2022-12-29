export class MemoryCard {

    private _id: number;
    private _image: string;
    private _hasBeenFound: boolean = false;
    private _hasBeenReturned: boolean = false;

    constructor(id: number, image: string) {
        this._id = id;
        this._image = image;
    }

    public get id(): number {
        return this._id;
    }

    public get image(): string {
        return this._image;
    }

    
    public get hasBeenFound() : boolean {
        return this._hasBeenFound;
    }
    
    public set hasBeenFound(v : boolean) {
        this._hasBeenFound = v;
    }
    
    public get hasBeenReturned() : boolean {
        return this._hasBeenReturned;
    }
    
    public set hasBeenReturned(v : boolean) {
        this._hasBeenReturned = v;
    }

}