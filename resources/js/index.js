import modal from './alpine/modal';
import drawer from './alpine/drawer';
import toaster from './alpine/toaster';
import page from './alpine/page';
import clipboard from './alpine/clipboard';
import pagination from './alpine/pagination';
import dataTable from './alpine/data-table';
import dataGallery from './alpine/data-gallery';
import audio from './alpine/audio';
import calendar from './alpine/calendar';
import carousel from './alpine/carousel';
import combobox from './alpine/combobox';
import command from './alpine/command';
import fileInput from './alpine/file-input';
import video from './alpine/video';
import form from './alpine/form';
import tabs from './alpine/tabs';
import search from './alpine/search';
import stepper from './alpine/stepper';
import { accordion, accordionItem } from './alpine/accordion';

const Plume = (Alpine) => {
    // Register components that are already Alpine plugins (Alpine.data + magic methods)
    Alpine.plugin(modal);
    Alpine.plugin(drawer);
    Alpine.plugin(toaster);
    Alpine.plugin(page);
    Alpine.plugin(clipboard);
    Alpine.plugin(form);

    // Register data-only components
    Alpine.data('pagination', pagination);
    Alpine.data('dataTable', dataTable);
    Alpine.data('dataGallery', dataGallery);
    Alpine.data('audio', audio);
    Alpine.data('calendar', calendar);
    Alpine.data('carousel', carousel);
    Alpine.data('combobox', combobox);
    Alpine.data('command', command);
    Alpine.data('fileInput', fileInput);
    Alpine.data('video', video);
    Alpine.data('tabs', tabs);
    Alpine.data('search', search);
    Alpine.data('stepper', stepper);
    Alpine.data('accordion', accordion);
    Alpine.data('accordionItem', accordionItem);
};

export default Plume;

export {
    modal,
    drawer,
    toaster,
    page,
    clipboard,
    pagination,
    dataTable,
    dataGallery,
    audio,
    calendar,
    carousel,
    combobox,
    command,
    fileInput,
    video,
    form,
    tabs,
    search,
    stepper,
    accordion,
    accordionItem,
};