// types/swiper.d.ts
declare module 'swiper' {
    export interface SwiperOptions {
        modules?: any[];
        loop?: boolean;
        pagination?: {
            el: string;
            clickable: boolean;
        };
        autoplay?: {
            delay: number;
        };
    }

    export class Swiper {
        activeIndex: any;
        realIndex: any;
        slideTo(newsIndex: number) {
            throw new Error("Method not implemented.");
        }
        params: any;
        slideToLoop(newsIndex: number) {
            throw new Error("Method not implemented.");
        }
        destroy(arg0: boolean, arg1: boolean) {
            throw new Error("Method not implemented.");
        }
        constructor(container: string | HTMLElement, options?: SwiperOptions);
    }

    export default Swiper;
}

declare module 'swiper/modules' {
    export const Autoplay: any;
    export const Pagination: any;
    export const Navigation: any;
}

declare module 'swiper/css';
declare module 'swiper/css/pagination';
declare module 'swiper/css/autoplay';
