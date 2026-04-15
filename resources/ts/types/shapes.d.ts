// resources/ts/types/shapes.d.ts

declare module "shapes" {
    export class Shape {
        constructor(id: number, name: string, color: string, area: number);
        getName(): string;
    }
    export class Modality_Repetition {
        count: number;
        interval: number;
    }
}

declare module "schema" {
    export interface Shape {
        id: number;
        name: string;
        color: string;
        area: number;
    }
    export interface Modality_Repetition {
        count: number;
        interval: number;
    }
}

declare module "shapes/css";
declare module "shapes/css/repetition";
declare module "shapes/css/shape";
